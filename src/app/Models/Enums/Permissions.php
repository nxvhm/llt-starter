<?php

namespace App\Models\Enums;
use App\Models\Enums\Roles;
use App\Lib\Traits\EnumTrait;

enum Permissions: string {
	use EnumTrait;

	case IMPORT_FILE = 'import-file';
	case EXPENSE_ADD = 'expense-add';
	case EXPENSE_EDIT = 'expense-edit';
	case EXPENSE_DELETE = 'expense-delete';
	case CATEGORY_CREATE = 'category-create';
	case CATEGORY_DELETE = 'category-delete';
	case CATEGORY_EDIT = 'category-edit';
}
