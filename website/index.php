<html>
    <head>
        <title>POZOS</title>
    </head>

    <body>
        <h1>Student Checking App</h1>
        <ul>
            <form action="" method="POST">
                <button type="submit" name="submit">List Students</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

                // Identifiants API
                $username = getenv('USERNAME') ?: 'fake_username';
                $password = getenv('PASSWORD') ?: 'fake_password';

                $context = stream_context_create([
                    "http" => [
                        "header" => "Authorization: Basic " . base64_encode("$username:$password")
                    ]
                ]);

                $url = 'http://api:5000/pozos/api/v1.0/get_student_ages';
                $json = @file_get_contents($url, false, $context);

                if ($json === false) {
                    echo "<li>Impossible de récupérer la liste des étudiants depuis l’API.</li>";
                } else {
                    $students = json_decode($json, true);

                    if (isset($students['student_ages']) && is_array($students['student_ages']) && count($students['student_ages']) > 0) {
                        foreach ($students['student_ages'] as $name => $age) {
                            $name = htmlspecialchars($name);
                            $age  = htmlspecialchars($age);
                            echo "<li>$name - Age: $age</li>";
                        }
                    } else {
                        echo "<li>Aucun étudiant trouvé.</li>";
                    }
                }
            }
            ?>
        </ul>
    </body>
</html>
