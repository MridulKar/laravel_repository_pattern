<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Category</title>
</head>
<body>

    <div class="container">
        <!-- modal starts-->
        <!-- modal create button starts -->

            <button type="button" class="float-right btn btn-success mt-3 mb-3" data-toggle="modal" data-target=".bs-example-modal-lg"><b>Create</b></button>

        <!-- modal create button ends -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- modal title starts -->
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel">Create Category</h6>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!-- modal title ends -->

                    <!-- modal body starts -->
                    <div class="modal-body">
                        <!-- form starts -->
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <label for="name">Enter Category Name</label>
                            <input type="text" class="form-control" name="name">

                    </div>
                    <!-- modal body ends -->

                    <!-- modal footer starts -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                        <!-- form ends -->
                    </div>
                    <!-- modal footer ends -->
                </div>
            </div>
        </div>
        <!-- modal ends-->

        <table id="datatable" class="table table-striped table-bordered">
            <thead class="bg bg-primary text text-white">
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($category as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>

                            <!-- modal starts-->
                            <!-- modal edit button starts -->

                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target=".bs-example-modal-lg{{ $item->id }}">Edit <i
                                        class="fa fa-pencil"></i></button>

                            <!-- modal edit button ends -->

                            <div class="modal fade bs-example-modal-lg{{ $item->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- modal title starts -->
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="myModalLabel">Edit & Update Category
                                            </h6>
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <!-- modal title ends -->

                                        <!-- modal body starts -->
                                        <div class="modal-body">
                                            <!-- form starts -->
                                            <form
                                                action="{{ route('category.update', [$item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <p>Enter New Category Name</p>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $item->name }}">
                                        </div>
                                        <!-- modal body ends -->

                                        <!-- modal footer starts -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                            <!-- form ends -->
                                        </div>
                                        <!-- modal footer ends -->
                                    </div>
                                </div>
                            </div>
                            <!-- modal ends-->
                            <!-- edit ends -->

                            <!-- destroy starts -->

                                <a class="btn btn-sm btn-danger"
                                    href="{{ route('category.destroy', [$item->id]) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                    Delete <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('category.destroy', [$item->id]) }}" method="POST"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>

                            <!-- destroy ends -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
