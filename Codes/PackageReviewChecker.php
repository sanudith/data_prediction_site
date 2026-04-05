<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            width: 50%;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .reviews {
            margin-top: 20px;
            text-align: left;
        }

        .review {
            background: #f9f9f9;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 5px solid #007bff;
        }

        .review strong {
            color: #007bff;
        }

        .review-form {
            margin-top: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Package Reviews</h2>
        <div class="reviews" id="reviews">
            <div class="review">
                <strong>John Doe:</strong> Great package! It was very useful.
            </div>
            <div class="review">
                <strong>Jane Smith:</strong> Affordable and reliable, highly recommended!
            </div>
        </div>

        <div class="review-form">
            <h3>Leave a Review</h3>
            <input type="text" id="name" placeholder="Your Name">
            <textarea id="reviewText" rows="4" placeholder="Your Review"></textarea>
            <button onclick="addReview()">Submit Review</button>
        </div>
    </div>

    <script>
        function addReview() {
            let name = document.getElementById("name").value;
            let reviewText = document.getElementById("reviewText").value;
            if (name === "" || reviewText === "") {
                alert("Please fill out all fields!");
                return;
            }

            let reviewsContainer = document.getElementById("reviews");
            let newReview = document.createElement("div");
            newReview.classList.add("review");
            newReview.innerHTML = `<strong>${name}:</strong> ${reviewText}`;
            
            reviewsContainer.appendChild(newReview);

            document.getElementById("name").value = "";
            document.getElementById("reviewText").value = "";
        }
    </script>

</body>
</html>
