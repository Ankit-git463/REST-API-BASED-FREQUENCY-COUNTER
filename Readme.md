# Word Frequency Analyzer

A web-based tool that analyzes word frequencies on any webpage. Simply input a URL and specify how many top words you'd like to see, and the analyzer will return the most frequently occurring words and their counts.

##  Features

-  **URL Analysis**: Analyze any public webpage by entering its URL
-  **Customizable Results**: Choose how many top frequent words to display
-  **Smart Text Processing**: Focuses on visible content, ignoring scripts and styles
-  **Real-time Results**: Dynamic table updates without page reloads
-  **Precise Analysis**: Accurate word frequency counting with noise filtering

## Tech Stack Used

- **Frontend**: HTML5, CSS3 (Bootstrap 5), Modern JavaScript
- **Backend**: PHP 7.4+ (RESTful API)
- **Data Format**: JSON

## 📁 Project Structure

.
├── index.html   # Main application interface
├── js
│   └── main.js             
├── api
│   └── restapi.php         # API endpoint for text analysis
└── README.md              # Project documentation


## 📥 Installation

1. **Clone the repository**

   git clone https://github.com/your-username/word-frequency-analyzer.git
   
   cd word-frequency-analyzer


3. **Start the PHP server**

   # Use XAMPP/WAMP/MAMP
   # Copy files to your web server directory
   

4. **Access the application**
   - Open your browser
   - Navigate to `http://localhost:8000`

## Usage

1. Enter a valid URL 
2. Specify the number of words to analyze
3. Click "Analyze"
4. View results in a dynamic table

## Technical Details

### Frontend (`index.html`)
- Responsive Bootstrap interface
- Modern JavaScript with async/await
- Dynamic DOM updates
- Error handling with user feedback

### Backend (`api/restapi.php`)
- URL validation and sanitization
- Efficient content fetching
- HTML parsing and text extraction
- Word frequency calculation
- JSON response formatting

## Example

### Input
```
URL: https://example.com
Number of words: 10
```

### Output
```json
{
  
    { "example" : 15},
    { "domain" :  12}
    // ... more results
}
```

## Error Handling

The application handles various error cases:
- Invalid URLs
- Inaccessible websites
- Network timeouts
- Malformed responses


## 👤 Author

Created by [Ankit Singh](https://github.com/Ankit-git463)

Overview and Demo :  [Follow the link](https://www.loom.com/share/481329a95e7c403681ee7077be78ec99?sid=e27666a3-94aa-407f-89f9-fc34848c4879)


Remember to ⭐ this repo if you found it helpful!
