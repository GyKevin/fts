<x-app-layout>
    <form action="{{route('admin.store.festivals')}}" method="post">
        @csrf
        <input type="text" name="festival_name" placeholder="Festival name" required>
        <input type="date" name="date" placeholder="Date" required>
        <input type="text" name="location" placeholder="Location" required>
        <input type="number" name="max_participants" placeholder="Max Capacity">
        <textarea name="festival_description" placeholder="Description"> </textarea>
        {{-- <input type="text" name="festival_image" placeholder="Image URL"> --}}
        <input type="date" name="registration_deadline" placeholder="deadline">
        <input type="submit" value="Submit">
    </form>
</x-app-layout>