


        </div>
        
<div class="footer">
            <div class="pull-right">
                Parce que <strong>j'y Crois</strong>.
            </div>
            <div>
                <strong>Copyright</strong> Ecole primaire la source&copy; 2017-2018
            </div>
        </div>
        </div>
         
        </div>
</div>



    <!-- Mainly scripts -->
    <script src="<?=  base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?=  base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=  base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=  base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=  base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=  base_url()?>assets/js/plugins/pace/pace.min.js"></script>
    
   

   <script type="text/javascript">
        // When the window has finished loading google map
        google.maps.event.addDomListener(window, 'load', initMap);
 //key AIzaSyAvlCo1Lw5XDo-cGBhl7MZ32FiDGHYyvaA 
        function initMap(){
            var myLatLng = {lat:45.342560, lng:-71.846093};
            
            var map = new google.maps.Map(document.getElementById('map1'),{
                zoom : 12,
                center: myLatLng
            });
            
            var marker = new google.maps.Marker({
                position:  myLatLng,
                map : map,
                title:  "Eplasource"
            });
        }
    </script>


    

</body>



</html>
