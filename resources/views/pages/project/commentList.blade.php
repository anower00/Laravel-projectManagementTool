@extends('layouts.masterProjectManager')

@section('content')
    <fieldset>
        <legend>
            <b>ALL COMMENT</b>
        </legend><br/>
        <br/><br/>
        <table width="100%" cellspacing="0" border="1" cellpadding="5">
            <tr>
                <th align="left">Project Name</th>
                <th align="left">Task Name</th>
                <th align="left">Comment</th>
                <th align="left">Commented By</th>
                <th align="left">Commented To</th>
                <th colspan="5">Actions</th>
            </tr>
            <tr>
                <td>Bagdhoom.com</td>
                <td>Change url</td>
                <td>if change project base may be developer work easily</td>
                <td>Nayeem</td>
                <td>Tonmoy,Alvi</td>
                <td width="40"><a href="commentdetail.php">Detail</a></td>
                <td width="30"><a href="commentedit.php">Edit</a></td>
                <td width="45"><a href="commentdelete.php">Delete</a></td>
            </tr>
            <tr>
                <td>School Management</td>
                <td>product Image change</td>
                <td>if descending order change work easily</td>
                <td>Alvi</td>
                <td>Mayeesha,Tonmoy</td>
                <td width="40"><a href="commentdetail.php">Detail</a></td>
                <td width="30"><a href="commentedit.php">Edit</a></td>
                <td width="45"><a href="commentdelete.php">Delete</a></td>
            </tr>
            <tr>
                <td>Gym Management</td>
                <td>Instrument drop down change</td>
                <td>Drop down lisk color green is better</td>
                <td>Anower</td>
                <td>Mayeesha,nayeem</td>
                <td width="40"><a href="commentdetail.php">Detail</a></td>
                <td width="30"><a href="commentedit.php">Edit</a></td>
                <td width="45"><a href="commentdelete.php">Delete</a></td>
            </tr>
        </table>
    </fieldset>
    @endsection
