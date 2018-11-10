@extends('layouts.masterProjectManager')
@section('content')

<fieldset>
    <legend align="center">
        <b>TASK LIST</b>
    </legend><br/>
    <br/><br/>
    <table width="100%" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <th align="left">Project Name</th>
            <th align="left">Task Name</th>
            <th align="left">Assign To</th>
            <th align="left">Assign BY</th>
            <th align="left">Priority</th>
            <th colspan="5">Actions</th>
        </tr>
        <tr>
            <td>Bagdoom.com</td>
            <td>Main Url</td>
            <td>tonmoy</td>
            <td>alvi</td>
            <td>High</td>
            <td width="40"><a href="taskdetail.php">Detail</a></td>
            <td width="30"><a href="taskedit.php">Edit</a></td>
            <td width="45"><a href="taskdelete.php">Delete</a></td>
        </tr>
        <tr>
            <td>School Management</td>
            <td>Controller</td>
            <td>mayeesha</td>
            <td>tonmoy</td>
            <td>medium</td>
            <td width="40"><a href="taskdetail.php">Detail</a></td>
            <td width="30"><a href="taskedit.php">Edit</a></td>
            <td width="45"><a href="taskdelete">Delete</a></td>
        </tr>
        <tr>
            <td>Hospital management</td>
            <td>Database</td>
            <td>anower</td>
            <td>alvi</td>
            <td>High</td>
            <td width="40"><a href="taskdetail.php">Detail</a></td>
            <td width="30"><a href="taskedit.php">Edit</a></td>
            <td width="45"><a href="taskdelete.php">Delete</a></td>
        </tr>
    </table>
    <hr />
    <a href="addtask.php" type="button" class="btn btn-success">Back to Add Task</a>
</fieldset>
    @endsection
