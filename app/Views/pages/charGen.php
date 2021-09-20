<h1 class="h3 mb-4 text-gray-800">ICONS Character Generator</h1>
<p class="lead">A random character generator, intended for the superhero RPG, ICONS, but perfectly capable of just being a seed for further superhero ideas. This functionality is entirely clientside; potentially insecure in a real context, but for a simple web toy that does nothing but hand the user a character sheet, it should be fine. The script itself runs through the exact process as written in the rulebook, rolling virtual dice to pick entries out of static storage arrays and string it all together into a character object, before finally printing it all out.</p>
<p><button id="rollNew">Create New Character</button></br>

<span id="Character Sheet">
    <div class="row">
        <div class="col-xs-12 col-md-4 ml-md-mr-auto mb-3 centered">
            <div class="card">
                <div class="card-header">
                    Origin
                </div>
                <div class="card-body">
                    <span id="Origin"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 ml-md-mr-auto mb-3 centered">
            <div class="card">
                <div class="card-header">
                    Attributes
                </div>
                <div class="card-body">
                    <span id="Attributes">
                        Prowess: <span id="prowess"></span><br>
                        Coordination: <span id="coordination"></span><br>
                        Strength: <span id="strength"></span><br>
                        Intellect: <span id="intellect"></span><br>
                        Awareness: <span id="awareness"></span><br>
                        Willpower: <span id="willpower"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 ml-md-mr-auto mb-3 centered">
            <div class="card">
                <div class="card-header">
                    Powers
                </div>
                <div class="card-body">
                    <span id="Powers"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 ml-md-mr-auto mb-3 centered">
            <div class="card">
                <div class="card-header">
                    Specialties
                </div>
                <div class="card-body">
                    <span id="Specialties"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 ml-md-mr-auto mb-3 centered">
            <div class="card">
                <div class="card-header">
                    Qualities
                </div>
                <div class="card-body">
                    <span id="Qualities"></span>
                </div>
            </div>
        </div>
    </div>
</span>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/charGen.js"></script>
