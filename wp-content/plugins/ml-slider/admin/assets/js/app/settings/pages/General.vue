<template>
<div>
	<split-layout :loading="loading">
		<template slot="header">{{ __('Slideshow Defaults', 'ml-slider') }}</template>
		<template slot="description">{{ __('Update default settings used when creating a new slideshow.', 'ml-slider') }}</template>
		<template slot="fields">
			<text-single-input v-model="settings.title" name="default-slideshow-title" @click="saveSettings()">
				<template slot="header">{{ __('Default Slideshow Title', 'ml-slider') }}</template>
				<template slot="description"><span v-html="defaultTitleDescription"/></template>
				<template slot="input-label">
					{{ __('Change the default title', 'ml-slider') }}
				</template>
			</text-single-input>
			<text-single-input v-model="settings.width" name="default-slideshow-width" @click="saveSettings()">
				<template slot="header">{{ __('Base Image Width', 'ml-slider') }}</template>
				<template slot="description">{{ __('Update the default width for the base image. This will be used for the slideshow dimensions and base image cropping.', 'ml-slider') }}</template>
				<template slot="input-label">
					{{ __('Change the default width', 'ml-slider') }}
				</template>
			</text-single-input>
			<text-single-input v-model="settings.height" name="default-slideshow-height" @click="saveSettings()">
				<template slot="header">{{ __('Base Image Height', 'ml-slider') }}</template>
				<template slot="description">{{ __('Update the default height for the base image. This will be used for the base image cropping and slideshow dimaneions. If set to 100% width, the height will scale accordingly.', 'ml-slider') }}</template>
				<template slot="input-label">
					{{ __('Change the default width', 'ml-slider') }}
				</template>
			</text-single-input>
			<switch-single-input v-model="settings.fullWidth" @change="saveSettings()">
				<template slot="header">{{ __('100% Width', 'ml-slider') }}</template>
				<template slot="description">{{ __('While the width and height defined above will be used for cropping (if enabled) and the base slideshow dimensions, you may also set the slideshow to stretch to its container.', 'ml-slider') }}</template>
			</switch-single-input>
		</template>
	</split-layout>
</div>
</template>

<script>
import { default as SplitLayout } from '../layouts/_split'
import { default as TextSingle } from '../inputs/_textSingle'
import { default as SwitchSingle } from '../inputs/_switchSingle'
import { Settings } from '../../api'
export default {
	components: {
		'split-layout' : SplitLayout,
		'text-single-input' : TextSingle,
		'switch-single-input' : SwitchSingle,
	},
	props: {},
	data() {
		return {
			loading: true,
			settings: {
				title: '',
				fullWidth: false,
				width: 0,
				height: 0,
			}
		}
	},
	computed: {
		defaultTitleDescription() {
			return this.sprintf(this.__('Change the default title that will be used when creating a new slideshow. Use %s and it will be replaced by the current slideshow ID.', 'ml-slider'), '<code class="bg-transparent p-0 font-bold">{id}</code>')
		}
	},
	created() {
		Settings.getDefaults().then(({data}) => {
			Object.keys(data.data).forEach(key => {
				if (this.settings.hasOwnProperty(key)) {
					this.settings[key] = data.data[key]
				}
			})
			this.loading = false
		}).catch(error => {
			this.notifyError('metaslider/settings-load-error', error.response, true)
		})
	},
	mounted() {},
	methods: {
		saveSettings() {
			const settings = JSON.stringify(this.settings)
			Settings.saveDefaults(settings).then(({data}) => {
				this.notifyInfo(
					'metaslider/settings-page-setting-saved',
					this.__('All settings saved', 'ml-slider'),
					true
				)
			}).catch(error => {
				this.notifyError('metaslider/settings-save-error', error.response, true)
			})
		}
	}
}
</script>
