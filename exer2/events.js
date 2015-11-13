<script>
function convertTemp(){
    var temperature = document.getElementById('temperature').value;
    var to = document.getElementById('to').value;

    if(isNaN(temperature) || temperature == ''){
        alert('Insira uma temperatura válida');
    }else{
        window.location = 'temperatureCalculator.php?temperature='+temperature+'&to='+to;
    }
}
</script>