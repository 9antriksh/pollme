<div id="navbar">
            <a class="navbut" href="index.php?action=aboutus">About Us</a>
            <a class="navbut" href="index.php?action=contactus">Contact Us</a>
            <a class="navbut" href="index.php?action=logout">Logout</a>
</div>
<div>
    <form  action="index.php?action=pollme" method="GET">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Enter the Name of the participants:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><p style="float:right">Name:</p></td>
                    <td><p><input id="name" type="text" /></p></td>
                </tr>
                <tr>
                    <td><input style="float:right" class="button" type="submit" value="Submit" onclick="additem()" /></td>
                    <td style="padding-left: 50px"><input  class="button" type="reset" value="Reset" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div id="tagtable">
    <table id="hash" style="border: 1px solid white">
        <thead>
            <tr>
                <th>Name</th><th>Hashtag</th>
            </tr>
        </thead>
        <tbody>
                    
        </tbody>
                
    </table>
</div>