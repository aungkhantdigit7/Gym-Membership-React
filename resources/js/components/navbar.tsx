import { useState } from 'react';
import {
  Icon2fa,
  IconBellRinging,
  IconDatabaseImport,
  IconFingerprint,
  IconKey,
  IconLogout,
  IconReceipt2,
  IconSettings,
  IconSwitchHorizontal,
  IconUser,
} from '@tabler/icons-react';
import { Code, Group } from '@mantine/core';
// import { MantineLogo } from '@mantinex/mantine-logo';
import classes from './navbar.module.css';
import { Link, router } from '@inertiajs/react';

const data = [
  { link: route('dashboard'), label: 'Dashboard', icon: IconBellRinging },
  { link: route('admin.trainers.list'), label: 'Trainers', icon: IconUser },


  // { link: route('billing'), label: 'Billing', icon: IconReceipt2 },
  // { link: route('security'), label: 'Security', icon: IconFingerprint },
  // { link: route('ssh-keys'), label: 'SSH Keys', icon: IconKey },
  // { link: route('databases'), label: 'Databases', icon: IconDatabaseImport },
  // { link: route('authentication'), label: 'Authentication', icon: Icon2fa },
  // { link: '', label: 'Other Settings', icon: IconSettings },
];


export function Navbar() {
  const currentPath = window.location.href;

  const links = data.map((item) => (
    <Link
      className={classes.link}
      data-active={item.link === currentPath || undefined}
      href={item.link}
      key={item.label}

    >
      <item.icon className={classes.linkIcon} stroke={1.5} />
      <span>{item.label}

      </span>
    </Link>
  ));

  return (
    <nav className={classes.navbar}>
      <div className={classes.navbarMain}>
        {/* <Group className={classes.header} justify="space-between">
          <Code fw={700}>v3.1.2</Code>
        </Group> */}
        {links}
      </div>

      <div className={classes.footer}>
        <a href="#" className={classes.link} onClick={(event) => event.preventDefault()}>
          <IconSwitchHorizontal className={classes.linkIcon} stroke={1.5} />
          <span>Change account</span>
        </a>

        <a href="#" className={classes.link} onClick={(event) => event.preventDefault()}>
          <IconLogout className={classes.linkIcon} stroke={1.5} />
          <span>Logout</span>
        </a>
      </div>
    </nav>
  );
}