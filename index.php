<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <!-- Formulaire d'ajout -->
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg p-6 mb-8 transform hover:scale-105 transition-transform duration-300">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un produit</h1>
            <form method="POST" action="" class="space-y-4">
                <div>
                    <input type="text" name="nom" placeholder="Nom du produit" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <input type="number" name="prix" step="0.01" placeholder="Prix (€)" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <button type="submit" name="ajouter" 
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-colors duration-300">
                    Ajouter
                </button>
            </form>
        </div>

        <!-- Affichage des produits -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Inclusion du fichier de connexion
            require_once 'db_connect.php';

            // Ajout d'un produit
            if(isset($_POST['ajouter'])) {
                $nom = $_POST['nom'];
                $prix = $_POST['prix'];
                if(!empty($nom) && !empty($prix)) {
                    $stmt = $pdo->prepare("INSERT INTO produits (nom, prix) VALUES (?, ?)");
                    $stmt->execute([$nom, $prix]);
                }
            }

            // Récupération et affichage des produits
            $stmt = $pdo->query("SELECT * FROM produits ORDER BY id DESC");
            while($produit = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "
                <div class='bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 group'>
                    <div class='flex justify-between items-center'>
                        <h2 class='text-xl font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300'>" . htmlspecialchars($produit['nom']) . "</h2>
                        <span class='text-lg font-medium text-green-600'>" . number_format($produit['prix'], 2) . " €</span>
                    </div>
                    <div class='mt-4 flex justify-end'>
                        <button onclick='deleteProduit(" . $produit['id'] . ")' 
                                class='text-red-500 hover:text-red-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300'>
                            Supprimer
                        </button>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>

    <script>
        function deleteProduit(id) {
            if(confirm('Voulez-vous vraiment supprimer ce produit ?')) {
                window.location.href = `?delete=${id}`;
            }
        }
    </script>

    <?php
    // Suppression d'un produit
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: index.php");
        exit;
    }
    ?>
</body>
</html>