@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <legend><b>COMMENT</b></legend>
        <br/>
        <form action="" method="post">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100"></td>
                    <td width="10"></td>
                    <td width="230"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Select Project</td>
                    <td>:</td>
                    <td>
                        <select name="" id="">
                            <option></option>
                            <option>Hospital Management System</option>
                            <option>E-Ticketing</option>
                            <option>Shopify</option>
                            <option>Skymart Online Shop</option>
                            <option>Daraz</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Select Task</td>
                    <td>:</td>
                    <td>
                        <select name="" id="">
                            <option></option>
                            <option>Complete UX</option>
                            <option>Change Test Cases</option>
                            <option>Link Problem</option>
                            <option>Change Color</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td>Comment</td>
                    <td>:</td>
                    <td>
                        <textarea cols="30" role="5" name="description"></textarea>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr />
            <input type="submit" value="SAVE" type="button" class="btn btn-success">
            <a href="allcomment.php" type="button" class="btn btn-success">Back to All Comments</a>
        </form>
    </fieldset>
    @endsection
