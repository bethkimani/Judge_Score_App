setInterval(() => {
    fetch('/Judge_Score_App/public/scoreboard.php')
        .then(response => response.text())
        .then(html => {
            document.body.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
}, 30000); // Refresh every 30 seconds