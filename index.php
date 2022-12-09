<?php
require_once 'vendor/autoload.php';

$data = [
    'text' => 'siren, SIREN',
    'text2' => 'raison, Raison Sociale',
    'text3' => 'adresse, Adresse',
    'text4' => 'codepostal, Code Postal',
    'text5' => 'tel, Téléphone',
    'text6' => 'nom, Nom',
    'text7' => 'prenom, Prénom',
    'select' => 'state,Etat:,,state,,,,state',
];

$optionsville = [
    'paris' => 'Paris',
    'lyon' => 'Lyon',
    'bordeaux' => 'Bordeaux',
    'marseille' => 'Marseille',
    'toulouse' => 'Toulouse',
    'albi' => 'Albi'
];

$form = new Formr\Formr('bulma');

$form->required = '*';

if ($form->submitted()) {
    $data = $form->validate('Name(min[2]|max[32]), Email Address, Comments, Age(greater_than[17])');

    $name = $data['name'];
    $email = $data['email_address'];
    $comments = $data['comments'];
    $age = $data['age'];

    if ($form->ok()) {
        $form->success_message = "Thank you, {$data['name']}!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>test Formr</title>
</head>

<body class="container">
    <?php 
        $form->messages();
        $form->open();
    ?>
    <div class="columns">
        <div class="form-section column is-half" id="entreprise-section">
            <h3 class="title is-3">Entreprise</h3>
            <?php
                $form->number('siren', 'SIREN', '', '', 'placeholder="Entrez le numéro de SIREN" class="text-siren"');
                $form->text('raison', 'Raison Sociale', '', '', 'placeholder="A remplir ou saisie auto si SIREN" class="text-raison"');
            ?>
        </div>
        <div class="form-section column is-half" id="particulier-section">
            <h3 class="title is-3">Particulier</h3>
            <?php
                $form->text('nom', 'Nom', '', '', 'placeholder="Saisissez le Nom" class="text-nom"');
                $form->text('prenom', 'Prénom', '', '', 'placeholder="Saisissez le Prénom" class="text-prenom"');
            ?>
        </div>
    </div>
    <div class="columns">
        <div class="form-section column is-full" id="contact-section">
            <h3 class="title is-3">Contact</h3>
            <?php
                $form->text('address', 'Adresse', '', '', 'placeholder="Renseignez l\'adresse" class="text-address"');
                $form->number('postal-code', 'Code Postal', '', '', 'placeholder="Renseignez le code postal" class="text-postal"');
                $form->number('telephone', 'Téléphone', '', '', 'placeholder="Saisissez le téléphone" class="text-tel"');
                $form->text('complement', 'Complément', '', '', 'placeholder="Complément d\'adresse" class="text-complement"');
                $form->select('ville', 'Ville', '', '', '', '', 'Sélectionner', $optionsville);
                $form->text('email', 'Mail', '', '', 'placeholder="Saisissez l\'email" class="text-email"');
                $form->submit_button('Valider');
                $form->close();
            ?>
        </div>
    </div>
</body>

</html>