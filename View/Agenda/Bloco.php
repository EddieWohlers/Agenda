<div id="page-wrapper">
    <div class="row" >
        <div class="col-lg-12">
            <div class="panel-heading">
                <h1 class="page-header">Agenda de <?php echo $dados['Atendente']['nome'];?></h1>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12">
            <div class="panel-heading">
                
                <?php
                $data = explode("-",$dados['Data']);
                $x = $data[0] -20;
                $i = $data[0] +20;
                ?><h4>
                    <form class="form-inline" action="/Agenda/Abrir/<?php echo $dados['Atendente']['id'];?>" method="post">
                    <label>Alterar data </label>
                    <select name="mes" class="form-control">
                        <option><?php echo $data[1];?></option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="ano" class="form-control">
                        <?php echo "<option>".$data[0]."</option>";
                        while($x <= $i){
                            echo"<option value='$x'>$x</option>";
                            $x++;
                        }
                        ?>
                    </select>
                    <button class="btn btn-primary btn-sm" type="submit"> Alterar</button>
                </form>
                    </h4>
            </div>
        </div>
    </div>
