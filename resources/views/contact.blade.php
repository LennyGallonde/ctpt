@extends("template")

@section("content")
<div class="banner" style="position: relative; text-align: center;">
    <img src="{{ asset('image/Drone.jpg') }}" alt="Vue aérienne" class="banner-img" style="width: 100%; height: auto; display: block;">

    <div class="banner-text" style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(209, 226, 196, 0.8); /* vert pastel transparent */
        padding: 20px;
        border-radius: 12px;
        max-width: 300px;
        width: 90%;
        box-shadow: 0 0 15px rgba(0,0,0,0.3);
        backdrop-filter: blur(3px);
    ">
        <h2 style="margin-top: 0; color: #2c2c2c; font-size: 1.3rem;">Contactez-nous</h2>

        <form action="mailto:administratif@ctpt.fr" method="post" enctype="text/plain" style="text-align: left; font-size: 0.9rem;">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="Nom" required style="width: 100%; margin-bottom: 8px; border: none; padding: 6px; border-radius: 4px;"><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="Prénom" required style="width: 100%; margin-bottom: 8px; border: none; padding: 6px; border-radius: 4px;"><br>

            <label for="email">Adresse e-mail :</label><br>
            <input type="email" id="email" name="Email" required style="width: 100%; margin-bottom: 8px; border: none; padding: 6px; border-radius: 4px;"><br>

            <label for="sujet">Sujet :</label><br>
            <input type="text" id="sujet" name="Sujet" required style="width: 100%; margin-bottom: 8px; border: none; padding: 6px; border-radius: 4px;"><br>

            <label for="message">Message :</label><br>
            <textarea id="message" name="Message" rows="3" required style="width: 100%; margin-bottom: 10px; border: none; padding: 6px; border-radius: 4px;"></textarea><br>

            <div style="text-align: center;">
                <button type="submit" style="
                    background-color: #2c2c2c;
                    color: white;
                    padding: 8px 16px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    margin-right: 6px;
                    font-size: 0.85rem;
                ">Envoyer</button>

                <button type="reset" style="
                    background-color: #555;
                    color: white;
                    padding: 8px 16px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 0.85rem;
                ">Réinitialiser</button>
            </div>
        </form>
    </div>
</div>
@endsection
