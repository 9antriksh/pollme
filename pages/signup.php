<div id="navbar">
            <a class="navbut" href="index.php?">Sign In</a>
            <a class="navbut" href="index.php?action=aboutus">About Us</a>
            <a class="navbut" href="index.php?action=contactus">Contact Us</a>
</div>
<div>
    <form action="index.php?action=signup" method="POST">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Sign Up</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><p style="text-align: right">Username:</p></td>
                    <td><p><input name="name" type="text" required="true" /></p></td>
                </tr>
                <tr>
                    <td ><p style="text-align: right">Password:</p></td>
                    <td><p><input name="password" type="password" required="true" /></p></td>
                </tr>
                <tr>
                    <td ><p style="text-align: right">Confirm Password:</p></td>
                    <td><p><input name="check_password" type="password" required="true" /></p></td>
                </tr>
                <tr>
                    <td ><p style="text-align: right">E-Mail:</p></td>
                    <td><p><input name="uemail" type="email" required="true" /></p></td>
                </tr>
                <tr>
                    <td ><p style="text-align: right">Date of Birth:</p></td>
                    <td><p><input name="dob" type="date" /></p></td>
                </tr>
                <tr>
                    <td ><p style="text-align: right">Name:</p></td>
                    <td><p> <input name="fname" type="text" /><p>
                            <input name="mname" type="text" /></p><p>
                            <input name="lname" type="text" /></p><p>
                        </p></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center"><input  class="button" type="submit" value="Sign Up" name="signup" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
