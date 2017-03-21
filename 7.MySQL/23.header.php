<!--      navbar-->
      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
<!--          container can be fixed or fluid, depending on my needs-->
            <div class="container-fluid">
<!--                header div will contain all the components -->
                <div class="navbar-header">
<!--                    navbar brand contains logo, brand, etc and a toggle-->
                    <a class="navbar-brand">Store</a>
<!--               button toggle appears for smaller devices-->
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
<!--                        need data-target and data-toggle above to link to navbar-collapse below-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
<!--                collapsible content-->
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">All products</a></li>
                         <li><a href="#">Help</a></li>
                        <li><a href="#">Departments <span class="caret"></span></a></li>
                    </ul>
<!--                    always good to place all form elements inside of navbar-bar-->
                    <form class="navbar-form navbar-left" role="search">
<!--                        good to place input elements inside of a input-group div-->
                        <div class="input-group">
                            <span class="input-group-btn"><button type="submit" class="btn btn-info">Go</button></span>
                            <label class="sr-only">Search</label>
                            <input type="text" id="search" class="form-control" placeholder="Search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>
                    
                    <form class="navbar-form navbar-right">
                        <input class="btn btn-success" type="button" value="Login">
                    </form>
                </div>
            </div>
      </nav>