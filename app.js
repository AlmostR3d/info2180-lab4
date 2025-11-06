// Wait until the page is loaded
document.addEventListener("DOMContentLoaded", () => {
  const button = document.getElementById("btn");
  const resultDiv = document.getElementById("result");

  button.addEventListener("click", async () => {
    const query = document.getElementById("search").value.trim();
    console.log("Search button clicked");
    let url = "superheroes.php";

    if (query !== "") {
      url += `?query=${encodeURIComponent(query)}`;
    }

    try {
      const response = await fetch(url);
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.text();
      resultDiv.innerHTML = data;
    } catch (error) {
      console.error("Error fetching data:", error);
      resultDiv.innerHTML = "<p>Unable to fetch superhero data.</p>";
    }
  });
});