<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-title {
            color: #343a40;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .col-form-label {
            font-weight: bold;
            color: #495057;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            color: #ffffff;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            color: #ffffff;
        }
        p {
            color: #495057;
            font-size: 16px;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$data->title}}</h4>

            <div class="row">
                @foreach(json_decode($data->data, true) as $key => $value)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                            <p>{{ is_array($value) ? implode(', ', $value) : $value }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>
