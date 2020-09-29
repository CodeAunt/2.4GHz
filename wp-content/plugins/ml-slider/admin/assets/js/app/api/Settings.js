import { Axios as api } from '../api'
import store from '../store'

// Note, this is a slow refactor so might appear incomplete
const Settings = {
	
	save(data) {
		let formData = new FormData()
		formData.append('slideshow_id', store.getters['slideshows/getCurrent'].id)
		formData.append('action', 'ms_update_all_settings')
		data.forEach(data => {
			formData.append(data.name, data.value)
		})
		return api.post('settings/save', formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		})
	},

	// Use this when the setting is not related to the slideshow itself (which would be in the store)
	saveSingle(key, value) {
		let formData = new FormData()
		formData.append('slideshow_id', store.getters['slideshows/getCurrent'].id)
		formData.append('setting_key', key)
		formData.append('setting_value', value)
		formData.append('action', 'ms_update_single_setting')
		
		return api.post('settings/save-single', formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		})
	},
	// Save a global option for the user
	saveGlobal(key, value) {
		let formData = new FormData()
		formData.append('setting_key', key)
		formData.append('setting_value', value)
		formData.append('action', 'ms_update_global_setting')
		
		return api.post('settings/save-global', formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		})
	},
	getDefaults() {
		return api.get('settings/defaults', {
			params: {
				action: 'ms_get_default_settings'
			}
		})
	},
	saveDefaults(settings) {
		let formData = new FormData()
		console.log(settings)
		
		formData.append('action', 'ms_update_default_settings')
		formData.append('settings', settings)
		// Object.keys(settings).forEach((setting, value) => {
		// 	formData.append(settings[setting], value)
		// })
		return api.post('settings/defaults/save', formData, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		})
	},
}

export default Settings
