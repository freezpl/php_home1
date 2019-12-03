<?php use \App\Core\Module; 
        $red = (isset($this->data['red'])? $this->data['red'] : 0);
        $green = (isset($this->data['green'])? $this->data['green'] : 0);
        $blue = (isset($this->data['blue'])? $this->data['blue'] : 0);
?>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-7">
    <h3>Colors</h3>
    <div class="row">
        <div class="col-md-8">
            <form class="form" method="post" action="/homes/1/colors/calculate">
            <?php 
                Module::quiqRender('form/simple_input', array('id'=>'R', 'name'=> 'red', 
                'type'=> 'range', 'label'=> 'Red (0-255)', 'min'=> 0, 'max'=> 255, 
                'value'=> $red ));                
                
                Module::quiqRender('form/simple_input', array('id'=>'G', 'name'=> 'green', 
                'type'=> 'range', 'label'=> 'Green (0-255)', 'min'=> 0, 'max'=> 255, 
                'value'=> $green ));
                
                Module::quiqRender('form/simple_input', array('id'=>'B', 'name'=> 'blue', 
                'type'=> 'range', 'label'=> 'Blue (0-255)', 'min'=> 0, 'max'=> 255, 
                'value'=> $blue ));
                ?>
                <button type="submit" class="btn btn-success">Apply Color</button>
            </form>            
        </div>
    <div class="col-md-4 color-block" 
    style="background:rgb(<?php echo $red.",".$green.",".$blue; ?>)">
    </div>
        
    </div>
</div>
</div>
</div>