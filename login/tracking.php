<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tracking.css">
    <title>Health Tracker</title>
</head>
<body>
    <header>
        <h1>Health Tracker</h1>
    </header>
    <main>
        <div id="stepTracking">
            <h2>Step Tracking</h2>
            <p id="stepCount">0 steps</p>
            <button onclick="addSteps(1000)">Add Steps</button>
            <button onclick="resetStepTracking()">Reset</button>
        </div>

        <div id="sleepMonitoring">
            <h2>Sleep Monitoring</h2>
            <label for="sleepHours">Sleep Hours: </label>
            <input type="number" id="sleepHours" placeholder="Enter hours">
            <button onclick="trackSleep()">Add</button>
        </div>

        <div id="heartRateTracking">
            <h2>Heart Rate Tracking</h2>
            <p id="heartRate">72 bpm</p>
            <label for="heartRateInput">Heart Rate (bpm): </label>
            <input type="number" id="heartRateInput" placeholder="Enter heart rate">
            <button onclick="trackHeartRate()">Add</button>
        </div>

        <div id="hydrationReminder">
            <h2>Hydration Reminder</h2>
            <p>Remember to drink water!</p>
            <label for="waterAmount">Water Amount (ml): </label>
            <input type="number" id="waterAmount" placeholder="Enter amount of water">
            <button onclick="drinkWater()">Add</button>
        </div>

        <section class="calculate session">
            <div class="calculate__container container grid">
                <div class="calculate__content">
                    <div class="section__titles">
                        <h1 class="section__title-border">CALCULATE</h1>
                        <h1 class="section__title">YOUR BMI</h1>
                    </div>

                    <p class="calculate_description">
                        The body mass index (BMI) calculator calculates body mass index from your weight and height.
                    </p>

                    <form action="" class="calculate__form" id="calculate-form">
                        <div class="calculate__box">
                            <input type="number" placeholder="Height" class="calculate__input" id="calculate-cm">
                            <label for="" class="calculate__label">cm</label>
                        </div>
                        <div class="calculate__box"> 
                            <input type="number" placeholder="Weight" class="calculate__input" id="calculate-kg">
                            <label for="" class="calculate__label">kg</label>
                        </div>

                        <button type="submit" class="button button__flex">
                            Calculate Now
                        </button>   
                    </form>

                    <p class="calculate__message" id="message"></p>   
                </div>
            </div>
        </section>  
    </main>
    <script src="tracking.js"></script>
</body>
</html>
