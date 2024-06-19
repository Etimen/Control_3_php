<?php
session_start();
require('database.php');
if (!isset($_SESSION['username'])) {
    header("Location: autentifier.php");
    exit;
}else{

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $statement = $pdo -> prepare('SELECT * FROM cars WHERE id = :id');
        $statement -> execute([
            'id' =>  $id
        ]);
        $car = $statement ->fetch(PDO::FETCH_ASSOC);
    }
    
    ?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="heading text-center font-bold text-3xl m-5 text-emerald-500">Modifier</div>
    <div class="heading text-center text-l m-5 text-black-400">Veuillez remplir tous les champs</div>

    <style>
        body {background:white !important;}
    </style>

    <form action="traitement-modifier.php" method="POST">
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input type="hidden" name="id" value="<?php echo $car['id']; ?>">

            <div>
                <label for="name" class="mb-2 block text-base font-medium text-[#07074D]"> Name: </label>
                <input type="text" name="name" id="name" value="<?php echo $car['name']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="brand" class="mb-2 block text-base font-medium text-[#07074D]"> brand: </label>
                <input type="text" name="brand" id="brand" value="<?php echo $car['brand']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="year" class="mb-2 block text-base font-medium text-[#07074D]"> year: </label>
                <input type="text" name="year" id="year" value="<?php echo $car['year']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="date_debut" class="mb-2 block text-base font-medium text-[#07074D]"> date_debut:</label>
                <input type="text" name="date_debut" id="date_debut" value="<?php echo $car['date_debut']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="size" class="mb-2 block text-base font-medium text-[#07074D]"> date_fin: </label>
                <input type="text" name="date_fin" id="date_fin" value="<?php echo $car['date_fin']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="buttons flex">
                <input class="btn border border-emerald-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 ml-2 bg-emerald-500 hover:bg-emerald-600" type="submit" value="Save">
            </div>
        </div>
    </form>
</body>
</html>
<?php } ?>