<h1 class="h3 mb-4 text-gray-800">New York Times</h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="controls">
                <form>
                    <p>
                        <label for="search">Enter a SINGLE search term (required): </label>
                        <input type="text" id="search" class="search" required>
                    </p>
                    <p>
                        <label for="start-date">(Optional) Enter a start date (format YYYYMMDD): </label>
                        <input type="date" id="start-date" class="start-date" pattern="[0-9]{8}">
                    </p>
                    <p>
                        <label for="end-date">(Optional) Enter an end date (format YYYYMMDD): </label>
                        <input type="date" id="end-date" class="end-date" pattern="[0-9]{8}">
                    </p>
                    <p>
                        <button class="submit">Submit search</button>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <nav class="js_hide">
                <button class="prev">Previous 10</button>
                <button class="next">Next 10</button>
            </nav>
            <section class="results">
            </section>
            <nav class="js_hide">
                <button class="prev">Previous 10</button>
                <button class="next">Next 10</button>
            </nav>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/nyt-api.js"></script>
