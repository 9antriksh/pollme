<div id="navbar">
            <a class="navbut" href="index.php?action=signup">Sign Up</a>
            <a class="navbut" href="index.php?action=aboutus">About Us</a>
            <a class="navbut" href="index.php?action=contactus">Contact Us</a>
</div>
<div>
    <form action="index.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Sign In</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><p style="float:right">Username:</p></td>
                    <td><p><input name="loginName" type="text" required="true" /></p></td>
                </tr>
                <tr>
                    <td ><p style="float:right">Password:</p></td>
                    <td><p><input name="loginPassword" type="password" required="true" /></p></td>
                </tr>
                
                <tr>
                    <td colspan="2" style="text-align:center"><input  class="button" type="submit" value="Sign In" name = "login" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>