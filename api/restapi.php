<?php
// Header for JSON Output: is set as application/json, ensuring the frontend interprets the response as JSON.

header("Content-Type: application/json");

// Then we do Request Method Validation and check if the HTTP request method is post or not 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Decode JSON input from the request body
    $input = json_decode(file_get_contents('php://input'), true);
    $url = $input['url'];
    $topN = isset($input['n']) ? intval($input['n']) : 10; 

    // Input Validation is done here 
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        // It Returns error if URL is invalid
        echo json_encode(['error' => 'Invalid URL']); 
        exit;
    }

    // HTML Content is fetched here :
    $content = @file_get_contents($url);
    if ($content === false) {
        
        // if fetching fails error is returned 
        echo json_encode(['error' => 'Unable to fetch URL content']);
        exit;
    }

    // Load content into DOMDocument and strip non-visible elements
    libxml_use_internal_errors(true);  

    
    $dom = new DOMDocument();
    $dom->loadHTML($content); 
   
    libxml_clear_errors(); 

    // Text Extraction is done here

    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//body//*[not(self::script or self::style or self::noscript)]/text()');

    // Concatenate all visible text into a single string
    $text = '';
    foreach ($nodes as $node) {
        $text .= ' ' . $node->nodeValue;
    }

    // Text Cleaning and Tokenization is done here 

    $text = strtolower($text);  
    // Punctuations are removed 

    $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);  
    $words = array_filter(explode(' ', $text), fn($word) => !empty(trim($word)));  

    // Word Frequency Calculation is done here 
    $wordCounts = array_count_values($words);  
    
    // Sort words by frequency in descending order
    arsort($wordCounts); 

    // Get top N words based on specified limit
    $topWords = array_slice($wordCounts, 0, $topN, true);

    // Output the top N words and their frequencies as JSON
    echo json_encode($topWords);
}
?>
