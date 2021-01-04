<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab">
                            Основные данные
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   value="{{ old('title', $item->title) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="title">Идентификатор</label>
                            <input name="slug"
                                   id="slug"
                                   type="text"
                                   value="{{ old('slug', $item->slug) }}"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_ud">Родитель</label>
                            <select name="parent_ud"
                                    id="parent_ud"
                                    type="text"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $category)
                                    <option value="{{ $category->id }}"
                                            @if($category->id == $item->parent_id) selected @endif>
                                        {{ $category->id }}. {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      class="form-control"
                                      rows="3">{{ old('description', $item->description) }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
