document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("searchForm");
  const resultDiv = document.getElementById("result");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const query = document.getElementById("search").value.trim();
    console.log("Search form submitted");
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