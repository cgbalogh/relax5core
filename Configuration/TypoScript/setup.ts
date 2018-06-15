
plugin.tx_relax5core_core {
    view {
        templateRootPaths.0 = EXT:relax5core/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5core_core.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5core/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5core_core.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5core/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5core_core.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5core_core.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_relax5core_ownerprefs {
    view {
        templateRootPaths.0 = EXT:relax5core/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5core_ownerprefs.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5core/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5core_ownerprefs.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5core/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5core_ownerprefs.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5core_ownerprefs.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_relax5core_aux {
    view {
        templateRootPaths.0 = EXT:relax5core/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5core_aux.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5core/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5core_aux.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5core/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5core_aux.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5core_aux.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_relax5core._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-relax5core table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-relax5core table th {
        font-weight:bold;
    }

    .tx-relax5core table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

page.includeJSFooter {
  jqteJs = EXT:relax5core/Resources/Public/Scripts/jquery-te-1.4.0.min.js
  jqteJs.forceOnTop = 0

  relax5coreJs = EXT:relax5core/Resources/Public/Scripts/relax5core.js
  relax5coreJs.forceOnTop = 0

  ddJs = EXT:relax5core/Resources/Public/Scripts/jquery.dd.js
  ddJs.forceOnTop = 0

  touchPunchJs = EXT:relax5core/Resources/Public/Scripts/jquery.ui.touch-punch.js
  touchPunchJs.forceOnTop = 0
}

page.includeJS {
  googleMapsApiJs = EXT:relax5core/Resources/Public/Scripts/googleMapsApi.js
  googleMapsApiJs.forceOnTop = 1
}

page.includeCSS {
   relax5coreCss = EXT:relax5core/Resources/Public/Styles/relax5core.css
   jqteCss = EXT:relax5core/Resources/Public/Scripts/jquery-te-1.4.0.css
   ddCss = EXT:relax5core/Resources/Public/Styles/dd.css

   relax5coreLess = EXT:relax5core/Resources/Public/Less/relax5core.less
}

page {
  headerData {
    1491345622 = TEXT
    1491345622.value = <script async defer src="https://maps.googleapis.com/maps/api/js?key={$plugin.tx_relax5core.settings.googleMapsApi}&callback=initMap&language=de"></script>

  }
}

plugin.tx_relax5core {
  settings {
    personShowPid = {$plugin.tx_relax5core.settings.personShowPid}
    companyShowPid = {$plugin.tx_relax5core.settings.companyShowPid}

    selectPersonRelationPid = {$plugin.tx_relax5core.settings.selectPersonRelationPid}
    selectCompanyRelationPid = {$plugin.tx_relax5core.settings.selectCompanyRelationPid}
    selectPersonLink = {$plugin.tx_relax5core.settings.selectPersonLink}
    selectCompanyLink = {$plugin.tx_relax5core.settings.selectCompanyLink}

    appointmentListCE = {$plugin.tx_relax5core.settings.appointmentListCE}
  }
}

plugin.tx_relax5core_aux {
    persistence {
        storagePid = {$plugin.tx_relax5core_core.persistence.storagePid}
    }
}

plugin.tx_relax5core._CSS_DEFAULT_STYLE (
        textarea.f3-form-error {
                background-color:#FF9F9F;
                border: 1px #FF0000 solid;
        }

        input.f3-form-error {
                background-color:#FF9F9F;
                border: 1px #FF0000 solid;
        }

        select.f3-form-error {
                background-color:#FF9F9F;
                border: 1px #FF0000 solid;
        }

        .{extension.cssClassName} table {
                border-collapse:separate;
                border-spacing:10px;
        }

        .{extension.cssClassName} table th {
                font-weight:bold;
        }

        .{extension.cssClassName} table td {
                vertical-align:top;
        }

        .typo3-messages .message-error {
                color:red;
        }

        .typo3-messages .message-ok {
                color:green;
        }
)

#config.tx_extbase {
#	objects {
#		TYPO3\CMS\Extbase\Domain\Model\Category {
#			className = CGB\Relax5core\Domain\Model\Category
#		}
#		TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository {
#			className = CGB\Relax5core\Domain\Repository\CategoryRepository
#		}
#	}
#}

#plugin.tx_relax5core {
#  persistence {
#    classes {
#      CGB\Relax5core\Domain\Model\Category {
#        mapping {
#          # recordType = 0
#          tableName = sys_category
#          columns {
#            # title.mapOnProperty = title
#            # description.mapOnProperty = description
#          }
#        }
#      }
#    }
#  }
#}