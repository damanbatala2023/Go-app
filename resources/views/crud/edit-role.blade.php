<!-- admin/edit-role.blade.php -->
<form action="{{ route('crud.update-role', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="usertype">Select role:</label>
    <select name="usertype" id="role">
        <option value="admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ $user->usertype=== 'user' ? 'selected' : '' }}>User</option>
    </select>
    <button type="submit">Update Role</button>
</form>