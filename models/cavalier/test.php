<head>
    <meta charset="UTF-8">
    <title>Autocomplétion avec jQuery UI</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="col-md-6">
        <div class="form-group">
            <label for="projectinput3">Ville</label>
            <input type="text" id="ville" class="form-control">
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var cities = ["Paris", "Marseille", "Lyon"];

            $('#ville').autocomplete({
                source: cities
            });
        });
    </script>
</body>