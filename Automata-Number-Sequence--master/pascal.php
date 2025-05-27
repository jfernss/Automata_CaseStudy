<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pascal Triangle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="Fliptop.jpg" type="image/png" />

    <style>
      body {
        background: url('bg-cover.png') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Roboto', sans-serif;
        color: #fff;
      }

      .card {
        background-color: #1a1a1a; 
        border: 2px solid #39ff14; 
        border-radius: 10px;
        box-shadow: 0 0 15px #39ff14; 
      }

      .card h2, .card h5 {
        font-family: 'Orbitron', sans-serif;
        color: #39ff14; 
      }

      .card p {
        font-size: 18px;
        color: #d1d1d1; 
      }

      .btn-warning {
        background-color: #39ff14; 
        border: none;
        color: #000;
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
        transition: all 0.3s ease;
      }

      .btn-warning:hover {
        background-color: #000;
        color: #39ff14;
        box-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14; 
      }

      .btn-home {
        background-color: #007bff; 
        border: none;
        color: #fff;
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
        transition: all 0.3s ease;
      }

      .btn-home:hover {
        background-color: #0056b3;
        color: #fff;
        box-shadow: 0 0 10px #007bff, 0 0 20px #007bff; 
      }

      @media (max-width: 768px) {
        .card {
          margin: 10px;
        }

        .card h2, .card h5 {
          font-size: 24px;
        }

        .card p {
          font-size: 16px;
        }

        label {
          font-size: 14px;
        }

        input {
          font-size: 14px;
        }

        .btn-warning, .btn-home {
          font-size: 14px;
        }
      }

      @media (max-width: 425px) {
        .form-control {
          font-size: 14px;
        }

        .form-label {
          font-size: 12px;
        }

        .btn {
          font-size: 12px;
        }
      }
    </style>
  </head>

  <body>
    <div class="container mt-5">
      <div class="card mx-auto" style="max-width: 1200px; margin-top: 120px;">
        <div class="card-body">
          <h2 class="fw-bold text-center">Pascal Triangle</h2>
          <p class="lh-base fst-italic text-center">A pascal's triangle is an arrangement of numbers in a triangular array such that the numbers at the end of each row are 1 
            and the remaining numbers are the sum of the nearest two numbers in the above row. 
            The number of elements in the nth row is equal to (n + 1) elements. </p>
        </div>
      </div>

      <div class="card mx-auto mt-4" style="max-width: 1200px;">
        <div class="card-body">
          <form method="POST" action="">
            <div class="row g-3 align-items-center">
              <div class="col-12 text-center mt-3">
                <label for="numRows" class="form-label fw-bold fs-5">
                  Input the number of rows:
                </label>
              </div>
              <div class="col-12">
                <input 
                  type="number" 
                  name="numRows" 
                  class="form-control" 
                  id="numRows" 
                  placeholder="Enter number of rows" 
                  required 
                  style="font-size: 18px; text-align: center;"
                />
              </div>
              <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-warning btn-lg me-2">Submit</button>
                <a href="index.html" class="btn btn-home btn-lg">Home</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
    function generatePascalTriangle($rows) {
        $triangle = [];
        
        // Base case for 0 rows
        if ($rows >= 0) {
            $triangle[0] = [1];
        }
        
        // Base case for 1 row
        if ($rows >= 1) {
            $triangle[1] = [1, 1];
        }
        
        // Generate the rest of the rows 
        for ($i = 2; $i <= $rows; $i++) {
            $triangle[$i] = [];
            $triangle[$i][0] = 1;  

            // Generate the middle values of the row
            for ($j = 1; $j < $i; $j++) {
                $triangle[$i][$j] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
            }

         
            $triangle[$i][$i] = 1;
        }
        
        return $triangle;
    }

    function displayPascalTriangle($triangle) {
        $rowCount = count($triangle);
        foreach ($triangle as $i => $row) {
            // Calculate indentation for each row
            $indentation = str_repeat('&nbsp;', ($rowCount - $i) * 2);
            echo '<div class="text-center">' . $indentation . implode(' ', $row) . '</div>';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numRows'])) {
        $numRows = intval($_POST['numRows']);

        if ($numRows < 0) {
            echo '<div id="errorCard" class="card mx-auto mt-4" style="max-width: 1200px; background-color: #2c2c2c; border: 2px solid #39ff14;">
                    <div class="card-body">
                        <h2 class="fw-bold text-center" style="color: #fff;">Error</h2>
                        <p class="fs-4 mb-0 text-center" style="font-size: 18px; color: #fff;">Negative numbers are not allowed. Please enter a number greater than or equal to 0.</p>
                        <div class="mt-4 d-flex justify-content-end align-items-center">
                            <p class="fw-bold fs-4 mb-0 me-3">Try again?</p>
                            <form method="POST" action="" class="d-flex">
                                <button type="submit" name="tryAgain" class="btn btn-warning btn-lg me-2">YES</button>
                                <a href="index.html" class="btn btn-danger btn-lg">NO</a>
                            </form>
                        </div>
                    </div>
                </div>';
        } else {
            $pascalTriangle = generatePascalTriangle($numRows); // Adjust to include 0th row
            echo '<div id="pascalCard" class="card mx-auto mt-4" style="max-width: 1200px;">
                    <div class="card-body">
                        <h2 class="fw-bold text-center">Pascal Triangle:</h2>
                        <pre class="fs-4 mb-0 text-center" style="color: #39ff14;">';
                        $minCellWidth = 4; // Minimum spacing for clean layout
$maxNumLength = strlen(max(array_map('max', $pascalTriangle)));
$cellWidth = max($maxNumLength + 2, $minCellWidth);

// Total width of the last row (used to center all rows)
$maxRowWidth = count(end($pascalTriangle)) * $cellWidth;

foreach ($pascalTriangle as $row) {
    $line = '';
    foreach ($row as $num) {
        $line .= str_pad($num, $cellWidth, ' ', STR_PAD_BOTH);
    }

    // Center the whole row relative to the widest one
    echo str_pad($line, $maxRowWidth, ' ', STR_PAD_BOTH) . "\n";

}

            echo '</pre>
                        <div class="mt-4 d-flex justify-content-end align-items-center" style="max-width: 1200px;">
                            <p class="fw-bold fs-4 mb-0 me-3">Try again?</p>
                            <form method="POST" action="" class="d-flex">
                                <button type="submit" name="tryAgain" class="btn btn-warning btn-lg me-2">YES</button>
                                <a href="index.html" class="btn btn-danger btn-lg">NO</a>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    }
    ?>

  
    <!-- Explanation Section -->
    <div class="container mt-5">
      <h2 class="text-center mb-4">How Pascal's Triangle Works</h2>
      <div class="card">
        <div class="card-body">
          <p class="fs-5">Pascal's triangle is generated using a simple algorithm:</p>
          <ol class="fs-5">
            <li>Start with a single 1 at the top.</li>
            <li>Each subsequent row starts and ends with 1.</li>
            <li>Each interior number is the sum of the two numbers directly above it.</li>
          </ol>
          <p class="fs-5">This algorithm is simple yet powerful, with applications in algebra and probability.</p>
        </div>
      </div>
    </div>

    <!-- Additional Information Section -->
    <div class="container mt-5 mb-5" style="margin-top: 15rem;">
      <h2 class="text-center mb-4" style="margin-top: 5rem;">Additional Information</h2>
      <div class="row g-3">
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">History</h5>
              <p class="card-text">Pascal's triangle is named after Blaise Pascal, a French mathematician, although it was studied centuries earlier in India, Persia, China, and Italy.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mathematical Properties</h5>
              <p class="card-text">Pascal's triangle is used to calculate combinations, and it has connections to binomial expansions and Fibonacci numbers.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Applications</h5>
              <p class="card-text">Pascal's triangle is used in probability, algebra, and combinatorics, and it appears in fractals and other mathematical patterns.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>