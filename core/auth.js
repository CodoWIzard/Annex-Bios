fetch('https://u231195.gluwebsite.nl/api/v1/movieData', {
    headers: {
      'Authorization': 'Bearer 0be8d9266c188d1e2e2550f41b7ba5f965c8daa4046c3a62f996e5547ac834b7',
    }
  })
    .then(response => {
      // Check if the response is JSON or plain text
      const contentType = response.headers.get("content-type");
      
      if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
      }
      
      if (contentType && contentType.includes("application/json")) {
        return response.json(); // Parse the JSON if it's JSON
      } else {
        return response.text(); // Otherwise, treat it as plain text
      }
    })
    .then(data => {
      console.log(data); // Output the data (JSON or text)
      // You can add logic to handle the response accordingly
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
  