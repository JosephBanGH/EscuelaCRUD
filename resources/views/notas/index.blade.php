<?php
// save_grades.php (for saving the updated grades)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $grades = $_POST['grades'];
    // Save $grades to a database or file here
    // Example: file_put_contents('grades.json', json_encode($grades));
    echo json_encode(['status' => 'success']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editable Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Editable Table</h2>
    <form id="gradesForm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>NOTA1</th>
                    <th>NOTA2</th>
                    <th>NOTA3</th>
                    <th>NOTA4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alumno 1</td>
                    <td contenteditable="true">A</td>
                    <td contenteditable="true">C</td>
                    <td contenteditable="true">A</td>
                    <td contenteditable="true">B</td>
                </tr>
                <tr>
                    <td>Alumno 2</td>
                    <td contenteditable="true">B</td>
                    <td contenteditable="true">C</td>
                    <td contenteditable="true">C</td>
                    <td contenteditable="true">A</td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onclick="saveGrades()">Save Grades</button>
    </form>
</div>

<script>
    function saveGrades() {
        var grades = [];
        $('table tbody tr').each(function() {
            var row = [];
            $(this).find('td').each(function() {
                row.push($(this).text().trim());
            });
            grades.push(row);
        });

        $.post('save_grades.php', {grades: grades}, function(response) {
            alert('Grades saved successfully');
        });
    }
</script>
</body>
</html>
