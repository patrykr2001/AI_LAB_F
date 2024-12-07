<?php
/** @var $car \App\Model\Car */
?>

<div class="form-group">
    <label for="make">Make</label>
    <input type="text" id="make" name="car[make]" value="<?= htmlspecialchars($car->getMake() ?? "") ?>">
</div>

<div class="form-group">
    <label for="model">Model</label>
    <input type="text" id="model" name="car[model]" value="<?= htmlspecialchars($car->getModel() ?? "") ?>">
</div>

<div class="form-group">
    <label for="year">Year</label>
    <input type="number" id="year" name="car[year]" value="<?= htmlspecialchars($car->getYear()) ?>">
</div>

<div class="form-group">
    <label for="price">Price</label>
    <input type="number" step="0.01" id="price" name="car[price]" value="<?= htmlspecialchars($car->getPrice()) ?>">
</div>

<div class="form-group">
    <label for="engine_capacity">Engine Capacity</label>
    <input type="number" step="0.01" id="engine_capacity" name="car[engine_capacity]" value="<?= htmlspecialchars($car->getEngineCapacity()) ?>">
</div>

<div class="form-group">
    <label for="fuel_type">Fuel Type</label>
    <input type="text" id="fuel_type" name="car[fuel_type]" value="<?= htmlspecialchars($car->getFuelType() ?? "") ?>">
</div>

<div class="form-group">
    <label for="horsepower">Horsepower</label>
    <input type="number" id="horsepower" name="car[horsepower]" value="<?= htmlspecialchars($car->getHorsepower()) ?>">
</div>

<div class="form-group">
    <label for="mileage">Mileage</label>
    <input type="number" id="mileage" name="car[mileage]" value="<?= htmlspecialchars($car->getMileage()) ?>">
</div>

<div class="form-group">
    <label for="transmission">Transmission</label>
    <input type="text" id="transmission" name="car[transmission]" value="<?= htmlspecialchars($car->getTransmission() ?? "") ?>">
</div>

<div class="form-group">
    <input type="submit" value="Submit">
</div>