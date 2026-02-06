<h1>Créer un produit</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nom du produit:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div>
        <label for="price">Prix:</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>

    <div>
        <label>Stock :</label>
        <input type="number" name="stock">
    </div>

    <div>
        <label for="category_id">Catégorie :</label>
        <select id="category_id" name="category_id" required>
            <option value="" disabled selected>Choisir une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Actif :</label>
        <input type="checkbox" name="is_active" value="1" checked>
    </div>

    <button type="submit">Créer</button>
</form>