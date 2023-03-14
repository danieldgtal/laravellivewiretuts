<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
    @livewireScripts
</head>

<body>
    <div class="container">
        <div class="row">
            {{-- @livewire('counter') --}}
            {{-- <livewire:counter /> --}}
            {{-- @livewire('comment') --}}
            <div class="col-md-6">
                <!-- Left side for listing posts -->
                <livewire:tickets />

            </div>

            <div class="col-md-6">
                <!-- Right side for adding posts -->
                <livewire:comments />
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
