<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Course Creation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
<nav >
<div><button><</button>back </div>
<div>Logged in as Instructor</div>
</nav>
    <form class="bootstrap-form-with-validation">
        <!-- echo Form::open(array('url' => '/uploadfile','files'=>'true')); -->
        <h2>Skills University Course Creation</h2>
        <div class="form-group mb-3"><label class="form-label" for="text-input">Course Title</label><input class="form-control" type="text" id="text-input" name="text-input"></div>
        <div class="form-group mb-3"><label class="form-label" for="text-input">Course Description</label><input class="form-control" type="text" id="text-input" name="text-input"></div>
        <div class="form-group mb-3">
            <div class="input-group"></div>
        </div>
        <div class="form-group mb-3"><label class="form-label" for="file-input">Video Upload</label><input class="form-control" type="file" id="file-input" name="file-input"></div><button class="btn btn-primary" type="submit">Upload</button>
        <div class="form-group mb-3">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="checkbox-input" id="formCheck-1"><label class="form-check-label" for="formCheck-1">*NOTE:-Tick if File Size is Bigger Than 10mb.&nbsp;</label></div>
        </div>
        <div class="form-group mb-3"><label class="form-label" for="file-input">Choose Course Type</label>
            <div class="form-check"><input class="form-check-input" type="radio" name="radio-group" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Free</label></div>
            <div class="form-check"><input class="form-check-input" type="radio" name="radio-group" checked="" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Paid</label></div>
            <!-- <div class="form-check"><input class="form-check-input" type="radio" name="radio-group" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Radio</label></div> -->
        </div>
    </form>
        <!-- echo Form::close(); -->
    <form>
        <div style="width: 200px;">
            <div class="text-center"></div>
            <div class="text-center mt-2"></div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>