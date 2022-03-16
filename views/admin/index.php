<div class="filter">
    <h1>Select models</h1>
    <div class="checkbox">
        <label><input type="checkbox" rel="apple" onchange="change()" />Apple</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" rel="samsung" onchange="change()" />Samsung</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" rel="xiaomi" onchange="change()" />Xiaomi</label>
    </div>
    <h1>Select processors</h1>
    <div class="checkbox">
        <label><input type="checkbox" rel="a9" onchange="change()" />A9</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" rel="a8" onchange="change()" />A8</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" rel="snapdragon" onchange="change()" />Snapdragon</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" rel="exynos" onchange="change()" />Exynos</label>
    </div>
</div>

<div class="result">
    <div class="apple a9">
        <h1>iPhone 7</h1>
    </div>
    <div class="apple a8">
        <h1>iPhone 6</h1>
    </div>
    <div class="samsung exynos">
        <h1>Samsung s7</h1>
    </div>
    <div class="xiaomi snapdragon">
        <h1>Xiaomi Redmi note 4x</h1>
    </div>
</div>
<script>
function change() {
    let results = Array.from(document.querySelectorAll('.result > div'));
    // Hide all results
    results.forEach(function(result) {
        result.style.display = 'none';
    });
    // Filter results to only those that meet ALL requirements:
    Array.from(document.querySelectorAll('.filter input[rel]:checked'), function(input) {
        const attrib = input.getAttribute('rel');
        results = results.filter(function(result) {
            return result.classList.contains(attrib);
        });
    });
    // Show those filtered results:
    results.forEach(function(result) {
        result.style.display = 'block';
    });
}
change();
</script>