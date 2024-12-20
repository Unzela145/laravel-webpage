<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* General Body Styling */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f4f8, #d1e3f2); /* Soft gradient */
            color: #333;
        }

        /* Header Styling */
        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 3rem;
            color: #333;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Product List Grid */
        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 50px;
            justify-content: center;
            margin-top: 40px;
        }

        /* Product Card Styling */
        .product {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
            height: 100%;
        }

        /* Hover Effect for Product Card */
        .product:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* Product Image Styling */
        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .product img:hover {
            transform: scale(1.1);
        }

        /* Product Title Styling */
        .product h2 {
            margin-top: 20px;
            font-size: 1.6rem;
            color: #333;
            font-weight: 600;
            line-height: 1.4;
        }

        /* Product Description Styling */
        .product p {
            margin: 15px 0;
            color: #777;
            font-size: 1rem;
            line-height: 1.6;
            height: 60px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Price Styling */
        .product .price {
            font-size: 1.8rem;
            font-weight: 700;
            color: #007bff;
            margin-top: 15px;
        }

        /* Button Styling */
        .product .btn, .product .view-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for View Button */
        .product .view-btn {
            background-color: #28a745; /* Green color for "View" button */
        }

        .product .view-btn:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .product .btn:hover {
            background-color: #0056b3;
        }

        /* Disabled button styling */
        .product .view-btn:disabled {
            background-color: #6c757d; /* Grey for disabled state */
            cursor: not-allowed;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
                margin-top: 40px;
            }
            .product-list {
                padding: 30px;
            }
            .product {
                padding: 20px;
            }
            .product img {
                height: 180px;
            }
        }
    </style>
</head>
<body>

    <h1>Product List</h1>

    <div class="product-list">
        @foreach ($products as $product)
            <div class="product">
                <!-- Display the image using the 'storage' helper -->
                <img src="{{ asset('storage/'.$product->image_url) }}" alt="{{ $product->name }}">

                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p class="price">${{ number_format($product->price, 2) }}</p>

                <!-- View Product Button, Disabled -->
                <button class="view-btn" disabled>View Product</button>
                
                <!-- Optionally, you can keep a "Normal" button or link here -->
                <!-- <a href="#" class="btn">View Product</a> -->
            </div>
        @endforeach
    </div>

</body>
</html>
