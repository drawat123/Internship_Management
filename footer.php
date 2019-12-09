    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(".toggleform").click(function(){
            $("#studentcreate").toggle();
            $("#studentlogin").toggle();
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('If you have already taken the student interview or want to reject his resume click OK to delete this message')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.delete1").click(function(e){
                if(!confirm('If you dont want to go to this interview or have already given interview here click OK to delete this message?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>
  </body>
</html>