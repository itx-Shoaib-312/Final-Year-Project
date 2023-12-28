<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p><strong>Company:</strong> {{ $data['company'] }}</p>
    <p><strong>Contact Name:</strong> {{ $data['contact_name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Location:</strong> {{ $data['location'] }}</p>
    <p><strong>Size:</strong> {{ $data['size'] }}</p>
    <p><strong>Power Supply Available:</strong> {{ $data['power_supply'] }}</p>
    <p><strong>Material:</strong> {{ $data['material'] }}</p>
    <p><strong>Waste:</strong> {{ $data['waste'] }}</p>
    <p><strong>Additional Information:</strong> {{ $data['additional_info'] }}</p>
</body>
</html>
