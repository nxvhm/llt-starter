import './bootstrap';
import Swal from 'sweetalert2'

document.addEventListener('livewire:init', () => {
	initGlobalEvents(Livewire);
});

window.showError = (
	title = 'Error occurred',
	text ='Error occurred, please try again later',
	confirmBtn = 'OK'
) => Swal.fire({title, text, icon: 'error', confirmButtonText: confirmBtn});

window.showConfirm = (params = {}) => {
	const defaultParams = {
		icon: 'warning',
		text: 'Are you sure you want to delete this item? Action cannot be reverted',
		title: 'Warning',
		showCancelButton: true,
		confirmButtonText: 'Yes',
		cancelButtonText: 'Cancel',
		customClass: {
			confirmButton: 'btn btn-outline-danger',
			cancelButton: 'btn btn-outline-secondary'
		}
	}

	params = {...defaultParams, ...params};
	return Swal.fire(params);
}

window.confirmWithDispatch = params => {
	if(!params || !params.hasOwnProperty('event'))
		return;


	showConfirm(params).then(res => {
		if(res.isConfirmed)
			Livewire.dispatch(params.event, params.eventParams);
	})
}

const initGlobalEvents = Livewire => {
	Livewire.on('unauthorized', (event) => {
		const options = {
			title: event.hasOwnProperty('title') ? event.title : 'Unauthorized',
			text: event.hasOwnProperty('text') ? event.text : 'You are not authorized to perform this action',
			icon: event.hasOwnProperty('icon') ? event.icon : 'warning',
			confirmButtonText: event.hasOwnProperty('confirmButtonText') ? event.confirmButtonText : 'OK'
		}
		Swal.fire(options);
	});

	Livewire.on('error', (event) => {
		const options = {
			title: event.hasOwnProperty('title') ? event.title : 'Error Occurred',
			text: event.hasOwnProperty('text') ? event.text : 'An Error Ooccurred. Please try again later',
			icon: event.hasOwnProperty('icon') ? event.icon : 'error',
			confirmButtonText: event.hasOwnProperty('confirmButtonText') ? event.confirmButtonText : 'OK'
		}
		Swal.fire(options);
	});

	Livewire.on('success', (event) => {
		const options = {
			title: event.hasOwnProperty('title') ? event.title : 'Success',
			text: event.hasOwnProperty('text') ? event.text : 'All changes have been successfully saved',
			icon: event.hasOwnProperty('icon') ? event.icon : 'success',
			confirmButtonText: event.hasOwnProperty('confirmButtonText') ? event.confirmButtonText : 'OK'
		}
		Swal.fire(options);
	});

	Livewire.on('warning', (event) => {
		const options = {
			title: event.hasOwnProperty('title') ? event.title : 'Warning',
			text: event.hasOwnProperty('text') ? event.text : 'Unprocessable entity. Please check your submitted data',
			icon: event.hasOwnProperty('icon') ? event.icon : 'warning',
			confirmButtonText: event.hasOwnProperty('confirmButtonText') ? event.confirmButtonText : 'OK'
		}
		Swal.fire(options);
	});

	Livewire.on('modal-close', event => {
		if(!event.name) {
			return [...document.querySelectorAll('.modal')].forEach(modalEl => {
				const modal = bootstrap.Modal.getInstance('#'+modalEl.getAttribute('id'));
				modal && modal.hide();
			});
		}
		const modal = bootstrap.Modal.getInstance('#'+event.name);
		modal && modal.hide();
	})

	Livewire.on('modal-open', event => {
		if(!event.name) {
			return [...document.querySelectorAll('.modal')].forEach(modalEl => {
				const modal = bootstrap.Modal.getInstance('#'.modalEl.getAttribute('id'));
				modal && modal.show();
			});
		}
		let modal = bootstrap.Modal.getInstance('#'+event.name);
		if(!modal) {
			modal = new bootstrap.Modal('#'+event.name);
			modal.show();
		} else {
			modal && modal.show();
		}
	})
}

window.alpineLoaderStart = () => document.getElementById('alpineLoader')?.dispatchEvent(new Event('alpine-loader.start'));
window.alpineLoaderStop = () => document.getElementById('alpineLoader')?.dispatchEvent(new Event('alpine-loader.stop'));
window.alpineLoaderMessage = (msg = null) => {
	document.getElementById('alpineLoader')?.dispatchEvent(new CustomEvent('alpine-loader.setMessage', {detail: {message: msg}}))
}
window.alpineLoaderProgress = (progress = 0) => {
	document.getElementById('alpineLoader')?.dispatchEvent(new CustomEvent('alpine-loader.setProgress', {detail: {progress}}));
}

window.addEventListener('alpine-loader.start', () => window.alpineLoaderStart());
window.addEventListener('alpine-loader.stop', () => window.alpineLoaderStop());
