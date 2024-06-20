<style>
    .homecontainer{
        height: 100vh;
        background-image: url(./img/img/login-bg.jpg);
        background-size: cover;
    }   
    .homecontent{
        background-color: rgba(0, 0, 0, 0.80);
        height: 100%;
        width: 100%;
    } 
    .hometitle{
        color: white;
        font-family: Poppins;
        width: 150vh;
        text-align: center;
        margin: 0px auto;
        position: relative;
        top: 100px;
    }
    .hometitle h1{
        font-size: 70px;
        font-weight: bold;
    }
    .wedbutton{
        width: 100%;
        display: flex;
        justify-content: center;
        position: relative;
        top: 250px;
    }
    .wedbutton a {
        text-decoration: none;
        color: white;
        font-family: Poppins;
        font-size: 25px;
        display: inline-block; /* Changed to inline-block to allow pseudo-element to affect its size */
        position: relative;
        overflow: hidden;
        margin: 10px;
    }

    .wedbutton a::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: Yellow;
        transform: scaleX(0);
        transition: transform 0.3s ease; /* Transition for the grow effect */
    }

    .wedbutton a:hover::before {
        transform: scaleX(1); /* Grow the line on hover */
    }

</style>

<div class="homecontainer" id="homecontainer">
    <div class="homecontent">
        <div class="hometitle">
            <h1>Sacred Heart of Jesus, Catholic Church</h1>
            <p style="text-align: center; font-size: 20px; font-weight: 200; font-style: italic;">Helping people find God and nurture their faith.</p>
        </div>
        <div class="wedbutton">
            <a href="event.php">Schedules</a>  
        </div>
        <div class="wedbutton">
            <a href="wedding-package">Wedding Offers</a>  
        </div>
    </div>
</div>