<script type="text/javascript">
   function changeLang()
   {
    document.getElementById('form_lang').submit();
   }
</script>

<?php 

    // Set Language variable
    if(isset($_GET['lang']))
    {
      
      $_SESSION['lang'] = $_GET['lang'];

     if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang'])
     {
        echo "<script type='text/javascript'> location.reload(); </script>";
     }

      $lang = $_SESSION['lang'];

    }
    else
    {
      $_SESSION['lang'] ="eng";

      $lang = "eng";
    }


    // Set Search variable
    if(isset($_GET['search']))
    {
      $_SESSION['search'] = $_GET["search"];  

      $search = $_SESSION['search'];
    }
    else
    {
      $_SESSION['search'] = "";

      $search = "";
    }

    //Set Font variable
    if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng')
    {
      $font = "Arial";

    }       
    else if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'unicode')
    {
      $font = "Pyidaungsu";
    }
    else
    {
       $font = "Arial";
    }

    

?>


<!-- Language and Search -->
        <nav class="navbar navbar-expand-md navbar-light bg-gray shadow-sm">
            <div class="container">

                <form method='get' action='' id='form_lang' >      
                    <label>Select Language</label>
                    <select name='lang' onchange='changeLang();' >
                            
                        <option value='eng' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng')
                                                  { echo "selected"; } 
                                            ?> 
                        >
                          English
                        </option> 

                        <option value='unicode' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'unicode')
                                                      { echo "selected"; } 
                                                ?> 
                        >
                          Unicode
                        </option>

                    </select>
                  </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">                         
                         
                      <form  method='get' action="{{ url("/q?search=$search&lang=$lang") }}" id='form_search'>

                          <input type="hidden" name="lang" value="{{ $lang }}">     
                  
                          <li class="nav-item">

                            <input  type="search" placeholder="Search" aria-label="Search" name="search" style="font-family: <?php echo $font; ?>;" value="{{ $search }}">

                            <button class="btn btn-outline-dark" type="submit" > Search </button>

                          </li>                    
                       </form>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">                      
                       <li class="nav-item"> 
                          Call Us Now 
                          <img src="{{ asset("/images/phone1.jpg") }}" style="width: 30px;height: 30px;">
                          <span>09796102277</span>,
                          <span>09269275904</span>
                      </li>
                    </ul>
                    

                </div>
            </div>
        </nav>
<!-- Language and Search -->