
plugin.tx_relax5core_core {
    view {
        # cat=plugin.tx_relax5core_core/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5core/Resources/Private/Templates/
        # cat=plugin.tx_relax5core_core/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5core/Resources/Private/Partials/
        # cat=plugin.tx_relax5core_core/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5core/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5core_core//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_relax5core_ownerprefs {
    view {
        # cat=plugin.tx_relax5core_ownerprefs/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5core/Resources/Private/Templates/
        # cat=plugin.tx_relax5core_ownerprefs/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5core/Resources/Private/Partials/
        # cat=plugin.tx_relax5core_ownerprefs/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5core/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5core_ownerprefs//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

plugin.tx_relax5core_person >
plugin.tx_relax5core_company >

plugin.tx_relax5core {
    view {
        # cat=plugin.tx_relax5core/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5core/Resources/Private/Templates/
        # cat=plugin.tx_relax5core/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5core/Resources/Private/Partials/
        # cat=plugin.tx_relax5core/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5core/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5core//a; type=string; label=Default storage PID
        storagePid =
    }

    settings {
        # cat=plugin.tx_relax5core//a; type=int; label=Person Show PID
        personShowPid =

        # cat=plugin.tx_relax5core//b; type=int; label=Company Show PID
        companyShowPid =

        # cat=plugin.tx_relax5core//c; type=int; label=Person Select Relation PID
        selectPersonRelationPid =

        # cat=plugin.tx_relax5core//d; type=int; label=Company Select Relation PID
        selectCompanyRelationPid =

        # cat=plugin.tx_relax5core//e; type=int; label=Person Select Link PID
        selectPersonLink =

        # cat=plugin.tx_relax5core//f; type=int; label=Company Select Link PID
        selectCompanyLink =

        # cat=plugin.tx_relax5core//g; type=int; label=Content Element UID of appointment table (datatable)
        appointmentListCE =

        # cat=plugin.tx_relax5core//z; type=string; label=Googla Maps API Key
        googleMapsApi =
    }
}