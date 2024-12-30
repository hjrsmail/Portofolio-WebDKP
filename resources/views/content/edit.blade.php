<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CKE5 in Laravel</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.3.1/ckeditor5-premium-features.css" />
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/",
                "ckeditor5-premium-features": "https://cdn.ckeditor.com/ckeditor5-premium-features/43.3.1/ckeditor5-premium-features.js",
                "ckeditor5-premium-features/": "https://cdn.ckeditor.com/ckeditor5-premium-features/43.3.1/"
            }
        }
    </script>
    <script type="module" src="{{ URL::asset('assets/vendor/ckeditor5.js') }}"></script>
</head>
<body>
    <label>Keterangan</label>
    <div class="form-control ckeditor" id="ket"></div>
    <textarea class="form-control ckeditor" name="ket" id="editor"></textarea>
</body>
</html>
