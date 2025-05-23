#!/usr/bin/env node

import ora from "ora";
import chalk from "chalk";
import inquirer from "inquirer";
import * as fs from "fs";
import { dirname } from "path";
import { fileURLToPath } from "url";
import createDirectoryContents from "./createDirectoryContents.js";
import createFiglet from "./createFiglet.js";

const CURR_DIR = process.cwd();
const __dirname = dirname(fileURLToPath(import.meta.url));

const CHOICES = fs.readdirSync(`${__dirname}/templates`);

const QUESTIONS = [
  {
    name: "project-choice",
    type: "list",
    message: "What project template would you like to generate?",
    choices: CHOICES,
  },
  {
    name: "project-name",
    type: "input",
    message: "Project name:",
    validate: function (input) {
      if (/^([A-Za-z\-\\_\d])+$/.test(input)) return true;
      else
        return "Project name may only include letters, numbers, underscores and hashes.";
    },
  },
];

const greet = async () => {
  createFiglet("SCODE-CLI");

  //Wait for 2 secs
  await new Promise((resolve) => setTimeout(resolve, 2000));

  inquirer.prompt(QUESTIONS).then((answers) => {
    const projectChoice = answers["project-choice"];
    const projectName = answers["project-name"];
    const templatePath = `${__dirname}/templates/${projectChoice}`;

    const spinner = ora(`Doing ${projectChoice}...`).start(); // Start the spinner

    fs.mkdirSync(`${CURR_DIR}/${projectName}`);

    createDirectoryContents(templatePath, projectName);

    setTimeout(() => {
      spinner.succeed(chalk.green("Done!"));
    }, 3000);
  });
};

greet();
